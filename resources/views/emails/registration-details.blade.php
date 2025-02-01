<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENREMCO Membership Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
        }
        .header h1 {
            margin: 0;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-section input, .form-section textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .signature-section {
            margin-top: 20px;
        }
        .signature-section div {
            margin-bottom: 10px;
        }
    </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="ENREMCO Logo">
            <h1>Environment and Natural Resources Employees Multi-Purpose Cooperative (ENREMCO)</h1>
            <p>DENR-10, Compound Cagayan de Oro City</p>
        </div>

        <p>The Chairperson<br>ENREMCO</p>
        <p>Madam/Sir:</p>
        <p>I have the honor to apply as member of ENREMCO Region 10. If accepted, I shall pledge my loyalty to the Cooperative.</p>

        <div class="form-section">
            <p><strong>Name:</strong> {{ $member->name }}</p>
            <p><strong>Email:</strong> {{ $member->email }}</p>
            <p><strong>Office:</strong> {{ $member->office }}</p>
            <p><strong>Home Address:</strong> {{ $member->address }}</p>
            <p><strong>Religion:</strong> {{ $member->religion }}</p>
            <p><strong>Sex:</strong> {{ $member->sex }}</p>
            <p><strong>Marital Status:</strong> {{ $member->marital_status }}</p>
            <p><strong>Annual Income:</strong> {{ $member->annual_income }}</p>
            <p><strong>Beneficiaries:</strong> {{ $member->beneficiaries }}</p>
            <p><strong>Birthdate:</strong> {{ $member->birthdate }}</p>
            <p><strong>Education:</strong> {{ $member->education }}</p>
            <p><strong>Employee ID:</strong> {{ $member->employee_ID }}</p>
        </div>
        <hr>
        <p>I hereby authorize the Disbursing Office/Cashier to deduct from my salary the amount of Fifty Pesos (₱50.00) as membership fee.</p>
        <p>Further authorize to deduct the amount of ₱_______ per month which is equivalent to 2% of my salary until the amount of _______ is fully satisfied, representing my subscribed Capital Stock of _______ shares.</p>
        <p>This application, where my signature is affixed, is my voluntary act and deed.</p>
        <p>This ______ day of ________, 2024.</p>

        <div class="signature-section">

            <div>___________________________<br>
                Applicant
            </div>

            <div class="container">
              <div class="row">
                <div class="col">
                    <div>Attested by:<br>
                    ___________________________<br>
                    Member
                    </div>
                </div>
                <div class="col">
                    <div>Approved:<br>
                ___________________________<br>
                MARY GRACE O. ALEMANIO<br>
                Chairperson
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
</body>
</html>
