<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form id="form">
        <input type="text" id="odp" name="odp" placeholder="Ile odpowiedzi" required>
        <br><br>
        <div id="error"></div>
        <button type="button" onclick="submitForm()">Wyślij</button>
    </form>

    <script>
        // Funkcja wysyłania formularza
        function submitForm() {
            const odp = document.getElementById('odp').value;

            if (odp > 40) {
                document.getElementById('error').innerHTML = `
                    <h1 style="color: red;">Debilu jest max 40 pytan</h1>
                `;
            } else {
                localStorage.setItem('odp', odp); // Zapis do localStorage
                window.location.href = 'odpowiedzi-inf03-ee09-programowanie-bazy-danych.php'; // Przekierowanie
            }
        }

        // Blokowanie nieprawidłowych znaków podczas wpisywania
        document.getElementById('odp').addEventListener('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, ''); // Usuwanie znaków, które nie są cyframi
        });

        // Nasłuchiwanie klawisza Enter
        document.getElementById('form').addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Zapobiega domyślnemu działaniu Enter
                submitForm(); // Wywołanie funkcji wysyłającej formularz
            }
        });
    </script>
</body>
</html>