        function validateForm() {
            var flag = true;

            // START PATTERN
            var alpha_pattern = /^[A-Z]{1}[a-z]{2,}$/;
            var email_pattern = /^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com){1}$/;
            var password_pattern = /[A-Z]{1}[a-z]+\d*[W]{1}/;
            // END PATTERN

            // TARGET INPUT FIELDS START HERE
            var first_name = document.querySelector("#first_name").value;
            var last_name = document.querySelector("#last_name").value;
            var email = document.querySelector("#email").value;
            var password = document.querySelector("#password").value;
            var address = document.querySelector("#address").value;
            var gender = document.querySelector("input[name='gender']:checked");
            var date_of_birth = document.querySelector("#date_of_birth").value;
            // TARGET INPUT FIELDS END HERE

            // TARGET ERROR MESSAGE START HERE
            var first_name_msg = document.querySelector("#first_name_msg");
            var last_name_msg = document.querySelector("#last_name_msg");
            var email_msg = document.querySelector("#email_msg");
            var password_msg = document.querySelector("#password_msg");
            var address_msg = document.querySelector("#address_msg");
            var gender_msg = document.querySelector("#gender_msg");
            var date_of_birth_msg = document.querySelector("#date_of_birth_msg");
            // TARGET ERROR MESSAGE END HERE

            //---------------------------------------------//
            if (first_name === "") {
                flag = false;
                first_name_msg.innerHTML = "Field Required...!";
            } else {
                first_name_msg.innerHTML = "";
                if (alpha_pattern.test(first_name) === false) {
                    flag = false;
                    first_name_msg.innerHTML = "First Name must be like Prag|Aneel|Akshy etc...!";
                }
            }
            //---------------------------------------------//

            //---------------------------------------------//
            if (last_name !== "") {
                last_name_msg.innerHTML = "";
                if (alpha_pattern.test(last_name) === false) {
                    flag = false;
                    last_name_msg.innerHTML = "Last Name must be like Bheel|Kumar etc...!";
                }
            } else {
                last_name_msg.innerHTML = "";
            }
            //---------------------------------------------//

            //---------------------------------------------//
            if (email === "") {
                flag = false;
                email_msg.innerHTML = "Field Required...!";
            } else {
                email_msg.innerHTML = "";
                if (email_pattern.test(email) === false) {
                    flag = false;
                    email_msg.innerHTML = "Email must be like prag@example.com, prag12@example.com etc...!";
                }
            }
            //---------------------------------------------//

            //---------------------------------------------//
            if (password === "") {
                flag = false;
                password_msg.innerHTML = "Field Required...!";
            } else {
                password_msg.innerHTML = "";
                if (password_pattern.test(password) === false) {
                    flag = false;
                    password_msg.innerHTML = "Password must be like Prag@123 or 123@Prag etc...!";
                }
            }
            //---------------------------------------------//

            //---------------------------------------------//
            if (address === "") {
                flag = false;
                address_msg.innerHTML = "Field Required...!";
            } else {
                address_msg.innerHTML = "";
            }
            //---------------------------------------------//

            //---------------------------------------------//
            if (!gender) {
                flag = false;
                gender_msg.innerHTML = "Field Required...!";
            } else {
                gender_msg.innerHTML = "";
            }
            //---------------------------------------------//

            //---------------------------------------------//
            if (date_of_birth === "") {
                flag = false;
                date_of_birth_msg.innerHTML = "Field Required...!";
            } else {
                date_of_birth_msg.innerHTML = "";
            }
            //---------------------------------------------//

            //---------------------------------------------//
            return flag;
        }