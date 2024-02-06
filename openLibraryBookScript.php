<?php

class BookFetcher
{
  public function displayEntriesTable($entryTitlesArr)
  {
    echo '<table border="1" cellpadding="10">';
    echo '<tr><th>Index</th><th>Entry Title</th></tr>';

    foreach ($entryTitlesArr as $index => $title) {
      echo "<tr><td>$index</td><td>$title</td></tr>";
    }

    echo '</table>';
  }

  public function fetchAuthorOpenLibIdFromName($authorName)
  {
    $authorNameEncoded = rawurlencode($authorName);
    $request = "https://openlibrary.org/search/authors.json?q={$authorNameEncoded}";

    $responseDecoded = json_decode(file_get_contents($request), true);


    if ($responseDecoded !== false)
      return $responseDecoded["docs"]["0"]["key"];
    else {
      return false;
    }

  }

  public function fetchBooksByAuthor($openLibraryId, $bookLimit = 50, $offset = 0)
  {
    $request = "https://openlibrary.org/authors/{$openLibraryId}/works.json";

    $response = json_decode(file_get_contents($request), true);

    if ($response !== false) {
      return $response["entries"];
    } else {
      return false;
    }
  }

  public function saveBooksToJson($authorName, $books, $filename)
  {
    file_put_contents($filename, json_encode(['books' => $books]));

    echo "Books by {$authorName} saved to {$filename}.json\n";
  }

  public function parseTitles($entryObjectArray)
  {
    $entryTitlesArr = [];

    if ($entryObjectArray)
      foreach ($entryObjectArray as $entryIndex => $entryObj) {
        if (is_array($entryObj))
          foreach ($entryObj as $entryObjectKey => $entryObjectKeyValue) {
            if ($entryObjectKey == "title")
              $entryTitlesArr[$entryIndex] = $entryObjectKeyValue;
          }
      }

    if ($entryTitlesArr)
      return $entryTitlesArr;
    else
      return false;
  }

  public function saveBooksTitleListByAuthor($authorName, $filename)
  {
    $authorOpenLibId = $this->fetchAuthorOpenLibIdFromName($authorName);

    $entryObjArr = $this->fetchBooksByAuthor($authorOpenLibId);

    if ($entryObjArr) {
      $entryTitlesArr = $this->parseTitles($entryObjArr);
      echo "Entries found by $authorName:\n<pre>";

      $this->displayEntriesTable($entryTitlesArr);

    } else {
      echo "No books found by $authorName.";
      return false;
    }


    if ($entryObjArr) {
      $this->saveBooksToJson($authorName, $entryObjArr, $filename);

      echo "Found{$entryObjArr}\n";
      return true;
    }

  }

}

$bookFetcher = new BookFetcher();
$books = $bookFetcher->saveBooksTitleListByAuthor('J. K. Rowling', 'JK_Rowling_Books');
