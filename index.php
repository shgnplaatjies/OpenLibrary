<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lil Open Library List</title>
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
              onclick="window.open('/OpenLibrary/ShaganPlaatjiesResumeElixirr.pdf', '_blank')">Resume&nbsp;&#11123;</button>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <h2>Latest Books</h2>
      <form action="displayEntriesPage.php" method="post">
        <label>Enter an author's name:
          <input type="text" id="authorName" name="authorName" placeholder="J. K. Rowling" minlength="1" maxlength="144"
            required />
        </label>
        <label>Entry Limit:
          <input type="number" id="entryLimit" placeholder="50" name="entryLimit" min="1" max="99" />
        </label>
        <label>Offset:
          <input type="number" id="entryOffset" placeholder="0" name="entryOffset" min="0" max=99 />
        </label>
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