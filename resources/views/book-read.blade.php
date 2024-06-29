<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedded PDF with Custom Styling</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            /* Background color of the page */
            font-family: Arial, sans-serif;
            /* Font for the page */
        }

        .pdf-container {
            width: 90%;
            /* Width of the container */
            max-width: 800px;
            /* Maximum width of the container */
            margin: 0px auto;
            /* Center the container horizontally */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Box shadow for a fancy effect */
            border-radius: 10px;
            /* Rounded corners */
            overflow: hidden;
            /* Hide overflow to prevent scrollbars */
            transform: scale(1.5)
        }

        .pdf-container embed {
            width: 100%;
            /* Ensure embedded PDF fills container */
            height: 720px;
            /* Fixed height or adjust as needed */
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <embed src="{{ asset("storage/$book#toolbar=0") }}" type="application/pdf" />
        <!-- or use <object data="example.pdf" type="application/pdf"></object> -->
    </div>
</body>

</html>
