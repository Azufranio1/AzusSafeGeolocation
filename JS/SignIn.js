const form = document.getElementById('registrationForm');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        
        // Requisitos de la contraseña
        const requirements = {
            length: /.{8,}/,
            uppercase: /[A-Z]/,
            lowercase: /[a-z]/,
            number: /[0-9]/,
            special: /[!@#$%^&*]/
        };

        // Función para validar la contraseña
        function validatePassword() {
            const pwd = password.value;
            let valid = true;

            // Validar cada requisito
            for (const [requirement, regex] of Object.entries(requirements)) {
                const isValid = regex.test(pwd);
                document.getElementById(requirement).classList.toggle('valid', isValid);
                document.getElementById(requirement).classList.toggle('invalid', !isValid);
                valid = valid && isValid;
            }

            // Validar que las contraseñas coincidan
            const passwordsMatch = password.value === confirmPassword.value;
            document.getElementById('match').classList.toggle('valid', passwordsMatch);
            document.getElementById('match').classList.toggle('invalid', !passwordsMatch);
            valid = valid && passwordsMatch;

            return valid;
        }

        // Eventos para validación en tiempo real
        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);

        // Validar antes de enviar el formulario
        form.addEventListener('submit', function(e) {
            if (!validatePassword()) {
                e.preventDefault();
                alert('Por favor, asegúrate de cumplir todos los requisitos de la contraseña.');
            }
        });