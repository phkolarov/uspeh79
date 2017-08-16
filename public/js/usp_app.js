var app = app || {};

app.system = (() => {

    function request(url, method, headers, data = {}, success, inpError) {
        if (!headers.hasOwnProperty('Content-Type')) {
            headers['Content-Type'] = 'application/json';
        }
      //  headers['session_id'] = this.cookieHelper.GetCookie('session_id')
        let that = this;
        let requestParams = {
            'url': url,
            'method': method,
            'headers': headers,
            'success': function (data) {
                let dataObj = {};
                if (isJsonString(data)) {
                    dataObj = JSON.parse(data);
                } else {
                    dataObj = data;
                }
                success(dataObj);
            },
            'error': inpError,
            beforeSend: function () {
                $('#ajaxLoader img').fadeIn(500);
            },
            complete: function () {
                $('#ajaxLoader img').fadeOut(500);
            }
        };

        if (method != 'GET') {
            requestParams.data = JSON.stringify(data)
        }

       return $.ajax(requestParams);
    }


    function isJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    function message(data) {

        let obj = {'success': {'message': 'ala bala'}};
        let type = Object.keys(data)[0];
        let message = data[type].message;
        new Noty(
            {
                type: type,
                layout: 'topCenter',
                timeout: 1000,
                text: message
            }
        ).show();
    }

    function urlReader() {
        if (window.location.hash.indexOf('=') >= 0) {
            let kvpair = {};
            let query = decodeURI(window.location.hash.replace('#', ''));
            let pairs = query.split('&');
            $.each(pairs, function (i, v) {
                let pair = v.split('=');
                kvpair[pair[0]] = pair[1];
            });

            let type = kvpair.hasOwnProperty('success') ? 'success' : kvpair.hasOwnProperty('warning') ? 'warning' : 'error'
            let message = kvpair[type];
            new Noty(
                {
                    type: type,
                    layout: 'topCenter',
                    timeout: 1000,
                    text: message
                }
            ).show();
            window.location.hash = '#'
        }
    }

    function globalExecutions() {

        $('.dropdown-toggle').on('click', function (ev) {
            $(this).next().slideToggle();

            if ($(this).hasClass('side-menu-dropdown')) {

                $(this).next().css({
                    position: 'relative',
                    width: '100%',
                    'box-shadow': 'none'
                });
            }
        });

        $(document).on('click', function (ev) {

            let element = $(ev.target).attr('id');
            if (element != 'top-dropdown' && element != 'side-menu-dropdown') {
                $('#top-dropdown-menu').slideUp();
            }
        })
    }

    return {
        request: request,
        message: message
    }
})();