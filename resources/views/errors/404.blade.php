<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Not Found</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Courier+Prime&display=swap");

        :root {
            /* Var Body */
            --body-color: #333333;
            --body-bg-color: #fffaf0;
            --body-font-family: "Courier Prime", sans-serif;

            /* Var Page 404 */
            --page-404-color: #7b341e;
        }

        body {
            background-color: var(--body-bg-color);
            color: var(--body-color);
            font-family: var(--body-font-family);
            text-align: center;
            margin: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        h1 {
            color: var(--page-404-color);
            font-size: 200px;
            margin: 0;
        }

        h2 {
            font-size: 65px;
            margin: 0;
        }
    </style>
</head>

<body>
    <main>
        <h1>
            <span id="digitOne">4</span><span id="digitTwo">💩</span><span id="digitThree">4</span>
        </h1>
        <h2>Sorry! Page not found</h2>
    </main>
    <script>
        const randomNum = () => Math.floor(Math.random() * 9) + 1;

        digitLoop(digitOne, 1400);
        digitLoop(digitThree, 1800);
        digitLoop(digitTwo, 2000, `💩`);

        function digitLoop(digit, max, text = 4) {
            let startTime = new Date().getTime();
            let interval = setInterval(() => {
                if (new Date().getTime() - startTime > max) {
                    clearInterval(interval);
                    digit.textContent = text;
                    return;
                }
                digit.textContent = randomNum();
            }, 30);
        }
    </script>
</body>

</html>
