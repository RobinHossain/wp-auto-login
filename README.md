# Wordpress Auto Login Option
The the following code will help you to get auto logged in from the wp-login page. You can set the access info based on the user roles.

## Details
The many of us need to show a website/theme/plugin demo publically. So, it's the good way to login publically. You don't need to let theme know the user/password. If you see the following animated image you will get idea.


![image](https://res.cloudinary.com/robinbd/image/upload/v1645450527/CDN/w3bd/wp_login.gif)



### How to use the code 
Just copy paste the following code snipped and paste it on your WP theme's `function.php` file in the bottom.

```
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

            users.admin = {name: 'sajjad', password: '@dH5^Q!H2du18kXatq915X^u'};
            users.developer = {name: 'mahin', password: 'nK2!tfH1x47nTST9su2jHmOm'};
            users.manager = {name: 'meherab', password: '%^ukKJlp$ZjiA*OEQp(wLXKT'};
            users.editor = {name: 'suvo', password: 'L@i!12CB8UP4HUpd6KNi3d@Q'};


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
```

#### Thank You!
