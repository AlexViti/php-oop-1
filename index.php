<?php

class Movie {
  private string $title;
  private int $rating;
  private DateTime $releaseDate;
  private string $director;
  private array $cast;
  
  public function __construct(string $title, ?int $rating = null, ?DateTime $releaseDate, ?string $director = null, ?array $cast = []) {
    $this->title = $title;
    $this->rating = $rating;
    $this->releaseDate = $releaseDate;
    $this->director = $director;
    $this->cast = $cast;
  }

  public function getTitle(): string {
    return $this->title;
  }

  public function getRating(): int {
    return $this->rating;
  }

  public function getReleaseDate(): string {
    return $this->releaseDate->format('d/m/Y');
  }

  public function getDirector(): string {
    return $this->director;
  }

  public function getCast(): array {
    return $this->cast;
  }

  public function getCastAsString(): string {
    return implode(', ', $this->cast);
  }
}

$theGodFather = new Movie('The Godfather', 9, new DateTime('1972-03-24'), 'Francis Ford Coppola', ['Marlon Brando', 'Al Pacino', 'James Caan']);
$zoolander = new Movie('Zoolander', 8, new DateTime('2001-03-24'), 'Ben Stiller', ['Ben Stiller', 'Owen Wilson', 'Will Ferrell', 'Christine Taylor']);

$movies = [$theGodFather, $zoolander];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie OOP</title>
</head>
<body>
  <?php
  foreach ($movies as $movie) {
    echo '<h2>' . $movie->getTitle() . '</h2>';
    echo '<p>Rating: ' . $movie->getRating() . '</p>';
    echo '<p>Release Date: ' . $movie->getReleaseDate() . '</p>';
    echo '<p>Director: ' . $movie->getDirector() . '</p>';
    echo '<p>Cast: ' . $movie->getCastAsString() . '</p>';
  }
  ?>
</body>
</html>
