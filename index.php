<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Lil Open Library List</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <header>
    <div class="container">
      <h1>Open Library Clone | PHP</h1>
      <nav>
        <ul class="left-menu">
          <li><button onclick="window.location.href='/OpenLibrary/index.php'">&larr;&nbsp;Back</button></li>
        </ul>
        <ul class="right-menu">
          <li>
            <button
              onclick="window.open('https://www.linkedin.com/in/shaganplaatjies/', '_blank')">Connect&nbsp;&rarr;</button>
          </li>
          <li>
            <button
              onclick="window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ', '_blank')">Resume&nbsp;&#11123;</button>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <h2>Latest Books</h2>
      <form action="openLibraryBookScript.php" method="post">
        <label for="authorName">Enter an author's name:</label>
        <input type="text" id="authorName" name="authorName" placeholder="J. K. Rowling" minlength="1" required />
        <button type="submit">Search</button>
      </form>
    </div>
  </main>

  <footer>
    <div class="container">
      <p>
        Made for fun (don't judge me) by Shagan Plaatjies. &copy; 2024 Lil Open
        Library List. All rights reserved.
      </p>
    </div>
  </footer>

</body>

</html>