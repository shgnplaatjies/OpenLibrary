<?php

class EntryFetcher
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

  public function fetchEntriesByAuthor($openLibraryId, $entryLimit = 50, $entryOffset = 0)
  {
    $request = "https://openlibrary.org/authors/{$openLibraryId}/works.json?limit={$entryLimit}&offset={$entryOffset}";

    $response = json_decode(file_get_contents($request), true);

    if ($response !== false) {
      return $response["entries"];
    } else {
      return false;
    }
  }

  public function saveEntriesToJson($authorName, $entries, $filename)
  {
    file_put_contents("$filename.json", json_encode(['entries' => $entries]));

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

  public function saveEntriesTitleListByAuthor($authorName, $filename, $entryLimit, $offsetLimit)
  {
    $authorOpenLibId = $this->fetchAuthorOpenLibIdFromName($authorName);

    $entryObjArr = $this->fetchEntriesByAuthor($authorOpenLibId, $entryLimit, $offsetLimit);

    if ($entryObjArr) {
      $entryTitlesArr = $this->parseTitles($entryObjArr);
      echo "<p>Entries found by $authorName:\n</p><pre>";

      $this->displayEntriesTable($entryTitlesArr);

    } else {
      echo "No books found by $authorName.";
      return false;
    }


    if ($entryObjArr) {
      $this->saveEntriesToJson($authorName, $entryObjArr, $filename);
      return true;
    }

  }

}
