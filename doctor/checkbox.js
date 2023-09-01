
        // Function to set a cookie with a given name, value, and expiration date
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get the value of a cookie by name
        function getCookie(name) {
            var nameEQ = name + "=";
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1, cookie.length);
                }
                if (cookie.indexOf(nameEQ) === 0) {
                    return cookie.substring(nameEQ.length, cookie.length);
                }
            }
            return null;
        }

        // Function to update the checkbox state and save it in a cookie
        function updateCheckboxState(checkbox) {
            var checkboxId = checkbox.id;
            var isChecked = checkbox.checked;
            setCookie(checkboxId, isChecked, 1000); 
        }

        // Function to initialize the checkbox states based on cookies
        function initializeCheckboxes() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function (checkbox) {
                var checkboxId = checkbox.id;
                var isChecked = getCookie(checkboxId) === "true"; // Convert string to boolean
                checkbox.checked = isChecked;
                // Attach event listener to each checkbox
                checkbox.addEventListener('change', function () {
                    updateCheckboxState(checkbox);
                });
            });
        }

        // Call the initialization function when the page loads
        window.onload = initializeCheckboxes;
    