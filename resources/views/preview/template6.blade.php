<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fendi Ali @fendialii - Linktree Template</title>
    <meta name="description" content="Fendi Ali - Linktree, Neumorphism Soft UI Design. ">
    <meta name="keywords" content="Linktree, Bio Link, Template, neumorphism UI, Theme, Codepen, GitHub">
    <meta name="robots" content="index, follow">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merienda+One&display=swap');

        :root {
            --bg-color:#EBECF0;
            --color-w: #FFF;
            --color-s: #BABECC;
            --accent-color:#7E90F8;
            --font: 'Poppins',sans-serif;
            --feneumorphism: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            --feneumorphism-inset:inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
        }


        body {
            margin:0;
            padding:0;
            box-sizing: border-box;
            display:flex;
            font-size: 16px;
            flex-direction: column;
            font-family: var(--font);
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            letter-spacing: -0.2px;
            color: var(--color-s);
            text-shadow: 1px 1px 1px var(--color-w);
            background-color: var(--bg-color);
        }

        .container {
            padding:50px;
            max-width:1080px;
            margin:0 auto;
        }
        .bumderan {
            -moz-box-shadow: var(--feneumorphism-inset);
            -webkit-box-shadow: var(--feneumorphism-inset);
            box-shadow: var(--feneumorphism-inset);
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;

        }

        .fomto {
            width: 90px;
            height: 90px;
            background: var(--bg-color);
            background-image: url("https://www.fendiali.net/wp-content/uploads/2020/12/fxndx-logo.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
        .heamder {
            color: var(--color-s);
            text-align: center;
            margin-bottom:35px;
        }
        .heamder h1 {
            font-family: 'Merienda One', cursive;
            font-weight: 400;
            font-size: 18px;
        }
        .btn-tree {
            margin:20px 0;
        }
        .btn-link {
            font-family: var(--font);
            font-size:1em;
            font-weight: 500;
            border: 0;
            outline: 0;
            width:100%;
            background-color:var(--bg-color);
            color:var(--accent-color);
            padding:10px 40px;
            border-radius:12px;
            min-width:190px;
            margin-bottom:30px;
            cursor: pointer;
            text-shadow: 1px 1px 0 var(--color-w);
            box-shadow: var(--feneumorphism);
            transition:background-color 300ms ease-in-out;
        }

        .btn-link:hover {
            box-shadow: var(--feneumorphism-inset);

        }
        .btn-link:active {
            box-shadow: var(--feneumorphism-inset);
        }
        .ngocok {
            animation: ngocok-animation 4.72s ease infinite;
            transform-origin: 50% 50%;
        }
        @keyframes ngocok-animation {
            0% { transform:translate(0,0) }
            1.78571% { transform:translate(5px,0) }
            3.57143% { transform:translate(0,0) }
            5.35714% { transform:translate(5px,0) }
            7.14286% { transform:translate(0,0) }
            8.92857% { transform:translate(5px,0) }
            10.71429% { transform:translate(0,0) }
            100% { transform:translate(0,0) }
        }

        footer {
            text-align: center;
        }
        footer a{
            color: var(--accent-color);
            text-decoration: none;
        }

    </style>
</head>

<body>

<div class="container">
    <header class="heamder">
        <img class="bumderan fomto">
        <h1>@fendialii</h1>
    </header>
    <main class="btn-tree">
        <button class="btn-link ngocok" onclick="location.href='https://bit.ly/31wRz5U'">My Personal Blog</button>
        <!--<button class="btn-link ngocok" onclick="location.href='https://bit.ly/3jiGNWV'">Tool: YouTube Tags Viewer</button>-->
        <button class="btn-link" onclick="location.href='https://twitter.com/fendialiii'">Twitter</button>
        <button class="btn-link" onclick="location.href='https://facebook.com/example.json'">Facebook</button>
        <button class="btn-link" onclick="location.href='https://instagram.com/fendialii'">Instagram</button>
    </main>
    <footer>
        Linktree Neumorphism Soft UI Design, Theme by <a href="https://www.instagram.com/fendialii">Fendi Ali</a>, Hosted on <a href="https://github.com/fendiali">GitHub</a>
    </footer>
</div>
</body>
</html>
