<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="feedback-container">
        <!-- Feedback Form -->
        <div class="feedback-form" id="feedbackForm">
            <h2>Kirimkan <span class="highlight">Feedback</span> Anda! 😊</h2>
            <p>Beri tahu kami bagaimana pengalaman Anda dan berikan komentar.</p>

            <!-- Star Rating -->
            <div class="star-rating">
                <input type="radio" name="star" id="star5" value="5">
                <label for="star5" title="Sangat Baik">★</label>
                <input type="radio" name="star" id="star4" value="4">
                <label for="star4" title="Baik">★</label>
                <input type="radio" name="star" id="star3" value="3">
                <label for="star3" title="Cukup">★</label>
                <input type="radio" name="star" id="star2" value="2">
                <label for="star2" title="Kurang">★</label>
                <input type="radio" name="star" id="star1" value="1">
                <label for="star1" title="Buruk">★</label>
            </div>

            <!-- Feedback Text -->
            <textarea placeholder="Tuliskan saran atau masukan Anda..." rows="4"></textarea>

            <!-- Submit Button -->
            <button class="submit-btn">KIRIM FEEDBACK</button>
        </div>
    </div>
</body>
</html>
<style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 10px;
        }

        .feedback-container {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .highlight {
            color: #0ea4e4;
        }

        p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Star Rating */
        .star-rating {
            display: flex;
            justify-content: center;
            flex-direction: row-reverse; /* Urutan input radio terbalik */
            margin-bottom: 20px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.3s;
        }

        /* Efek hover dan checked */
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5c518; /* Warna bintang yang dipilih */
        }

        /* Text Area */
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: none;
            outline: none;
        }

        textarea:focus {
            border-color: #0ea4e4;
        }

        /* Submit Button */
        .submit-btn {
            background-color: #f08632;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0b83b1;
        }
    </style>