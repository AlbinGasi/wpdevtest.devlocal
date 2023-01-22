
class GetToken {
    timeoutSec = 10;
    url = 'https://symfony-skeleton.q-tests.com';
    formEl = document.querySelector('#get_token');

    constructor() {
        this.formSubmission();
    }

    /**
     * Add event listener on form
     */
    formSubmission() {
        if ( this.formEl !== null ) {
            // Check if the user is already logged in
            const tokenExist = this.getCookie('token_key');

            // I should check whether the token key match with current user, but I guess it's not mandatory
            if ( tokenExist ) {
                // Hide form
                this.formEl.remove();
                // Show the user he is logged in
                document.querySelector('#user-logged-in').style.display = 'block';
            }

            // formEl.addEventListener('submit', this.login.bind(this));
            // Since we are using elementor form (I didn't want to spend time on style) I have to prevent click on btn
            this.formEl.querySelector('#send-request').addEventListener('click', this.login.bind(this));
        }
    }

    /**
     * Set timeout method if the request take too long
     * @param s
     * @returns {Promise<unknown>}
     * @private
     */
    _timeout(s) {
        return new Promise(function (_, reject) {
            setTimeout(function () {
                reject(new Error(`Request took too long! Timeout after ${s} seconds`));
            }, s * 1000);
        });
    }

    /**
     * Get data using fetch
     * @param url
     * @param data
     * @returns {Promise<*>}
     * @private
     */
    async _ajax(url, data = undefined) {
        try {
            const fetchData = data ? fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }) : fetch(url);

            const res = await Promise.race([fetchData, this._timeout(this.timeoutSec)]);

            if ( !res.ok ) {
                if ( res.status === 401 || res.status === 422 ) {
                    throw new Error(`Wrong username or password!`);
                } else {
                    throw new Error(`Request faild with status code ${res.status}`);
                }
            }

            return await res.json();
        } catch (err) {
            throw err;
        }
    }

    /**
     * Method used to check user credentials and attach the token key in cookies in case creds are right
     * @param event
     * @returns {Promise<void>}
     */
    async login(event) {
        event.preventDefault();
        const email = document.querySelector('#form-field-email').value;
        const password = document.querySelector('#form-field-password').value;
        // Test/Debug - Delete it after (but since this is just test I am going to leave it)
        // email: 'ahsoka.tano@q.agency'
        // password: 'Kryze4President'
        const loginData = {email, password}

        try {
            const data = await this._ajax(`${this.url}/api/v2/token`, loginData);
            console.log(data);
            this.setCookie({value: data.token_key, expires: data.expires_at});

            elementorProFrontend.modules.popup.showPopup( { id: 127 } );

            this.formEl.remove();
            // Show the user he is logged in
            document.querySelector('#user-logged-in').style.display = 'block';

        } catch (err) {
            elementorProFrontend.modules.popup.showPopup( { id: 130 } );
            console.log(err)
        }
    }

    setCookie({expires, value}) {
        console.log(expires, value);
        const expiresAt = new Date(expires).toUTCString();
        const cookie = `token_key=${value}; expires=${expiresAt}; path=/`;
        document.cookie = cookie;
    }

    getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(";").shift();
    }
}

new GetToken();


