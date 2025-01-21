<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Anemia Symptom Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #aaf0a7, #87ceeb);
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #00d9a6;
            color: white;
            padding: 30px;
            text-align: center;
            font-size: 1.8rem;
        }

        .container {
            padding: 30px;
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            flex-grow: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 1.2rem;
        }

        input[type="text"] {
            width: 100%;
            padding: 15px 0 15px 2px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        button {
            background-color: #00d9a6;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2rem;
            width: 100%;
        }

        button:hover {
            background-color: #00d9a6;
            opacity: 0.8;
        }

        .results {
            margin-top: 30px;
        }

        .results div {
            background: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #00d9a6;
            color: white;
        }

        @media (max-width: 600px) {
            body {
                font-size: 90%;
            }

            header {
                font-size: 1.5rem;
            }

            button {
                width: 100%;
            }
        }
    </style>


</head>
<body>
    <header>
        Anemia Symptom Checker
    </header>

    <div class="container">
        <form id="symptomForm">
            <div class="form-group">
                <label for="symptoms">Enter Symptoms (comma-separated):</label>
                <input type="text" id="symptoms" name="symptoms" placeholder="e.g., Fatigue, Paleness, Dizziness">
            </div>
            <button type="button" onclick="checkSymptoms()">Check Symptoms</button>
        </form>

        <div id="results" class="results"></div>
    </div>

    <footer>
        &copy; 2024 Anemia Symptom Checker. All rights reserved.
    </footer>

    <script>
        async function checkSymptoms() {
            const symptoms = document.getElementById('symptoms').value;

            if (!symptoms) {
                alert('Please fill in the symptoms.');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const response = await fetch('/check-symptoms', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ symptoms })
            });

            const result = await response.json();

            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';

            if (result.error) {
                resultsDiv.innerHTML = `<div>${result.error}</div>`;
            } else {
                result.forEach(res => {
                    const matching = res.matching_symptoms.length > 0 ? res.matching_symptoms.join(', ') : 'None';
                    const severity = res.severity ? `<strong>Severity:</strong> ${res.severity}` : '';
                    const treatment = res.treatment ? `<strong>Treatment:</strong> ${res.treatment}` : 'No treatment available';
                    resultsDiv.innerHTML += `
                        <div>
                            <strong>${res.type}</strong><br>
                            Matching Symptoms: ${matching}<br>
                            Message: ${res.message}<br>
                            ${severity}<br>
                            ${treatment}
                        </div>`;
                });
            }
        }

    </script>
</body>
</html>
