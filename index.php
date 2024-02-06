<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Lil Open Library List</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="" />
</head>

<body>
  <header>
    <h1>Knowledge😎</h1>
    <nav>
      <ul>
        <li><a href="/OpenLibrary/index.php">&larr;Back</a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Mr Astley:&#41;</a></li>
        <li>
          <a href="https://www.linkedin.com/in/shaganplaatjies/">Let's Connect &rarr;</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Latest Books</h2>
    <form action="openLibraryBookScript.php" method="post">
      <label>
        Enter an author's name:
        <input title="Only unencoded, plain text" type="text" id="authorName" name="authorName"
          placeholder="J. K. Rowling" minlength="1" required />
      </label>
      <button type="submit">Buy Now!</button>
    </form>
  </main>

  <footer>
    <p>
      Made for fun (don't judge me) by Shagan Plaatjies. &copy; 2024 Lil Open
      Library List. All rights reserved.
    </p>
  </footer>
</body>

</html>