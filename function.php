<?php


if( is_wplogin() ){
	add_action('login_footer', 'wp_login_script_to_fill_password');
	function wp_login_script_to_fill_password() {
		?>
		<script>
            var users = {};
            var loginSelector = document.getElementById("login");
            var wrapperDiv = document.createElement("div");
            var containerDiv = document.createElement("div");
            var wl_login_option = null;
            var wl_login_option_text = null;
            var total_click = 0;

            users.admin = {name: 'sajjad', password: 'alskdfjlaskdjfla'};
            users.developer = {name: 'mahin', password: 'alskdfjlaskdjfla'};
            users.manager = {name: 'meherab', password: 'alskdfjlaskdjfla'};
            users.editor = {name: 'suvo', password: 'alskdfjlaskdjfla'};


            wrapperDiv.className = 'wl__wrapper';
            containerDiv.className = 'wl__container';

            for (var uk in users) {
                if (users.hasOwnProperty(uk)) {
                    wlLoginOption(uk, users[uk].name, users[uk].password)
                }
            }

            function wlLoginOption(type, user, pass){
                wl_login_option = document.createElement("span");
                wl_login_option.addEventListener('click', event => {
                    if(total_click === 0){
                        document.getElementById("user_login").value = user
                        document.getElementById("user_pass").value = pass
                        document.getElementById("loginform").submit();
                        total_click +=1;
                    }
                });
                wl_login_option.className = 'login_option';
                wl_login_option_text = document.createTextNode(`Login as an ${type}`);
                wl_login_option.appendChild(wl_login_option_text);
                containerDiv.appendChild(wl_login_option)
            }

            wrapperDiv.appendChild(containerDiv);
            loginSelector.parentNode.insertBefore(wrapperDiv, loginSelector.nextSibling);
		</script>
        <style>
            .wl__wrapper {display: block;background: #ffffff;border: 1px solid lightgray;border-radius: 2px;width: 20rem; margin: 0 auto;}
            .wl__wrapper .wl__container {display: flex;position: relative;flex-flow: column;padding: 1rem;}
            .wl__wrapper .wl__container span.login_option {font-size: 15px;width: 100%;background: #2271b1;color: #ffffff;text-align: center;border-radius: 5px;padding: 8px 0;margin: 4px 0;cursor: pointer;}
        </style>
		<?php
	}
}
