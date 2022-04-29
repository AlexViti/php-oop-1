<?php

class Movie {
  private string $title;
  private int $rating;
  private DateTime $releaseDate;
  private string $director;
  private array $cast;
  
  // Constructor
  public function __construct(string $title, ?int $rating = null, ?DateTime $releaseDate, ?string $director = null, ?array $cast = []) {
    $this->setTitle($title);
    $this->setRating($rating);
    $this->setReleaseDate($releaseDate);
    $this->setDirector($director);
    $this->setCast($cast);
  }

  // GETTERS
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

  // SETTERS
  public function setTitle(string $title): void {
    $this->title = $title;
  }

  public function setRating(int $rating): void {
    try {
      if ($rating < 0 || $rating > 10) {
        throw new Exception('Rating must be between 0 and 10');
      }
      $this->rating = $rating;
    } catch (Exception $e) {
      echo $e->getMessage();
    } 
  }

  public function setReleaseDate(DateTime $releaseDate): void {
    $this->releaseDate = $releaseDate;
  }

  public function setDirector(string $director): void {
    $this->director = $director;
  }

  public function setCast(array $cast): void {
    $this->cast = $cast;
  }
}

$theGodFather = new Movie('The Godfather', 9, new DateTime('1972-03-24'), 'Francis Ford Coppola', ['Marlon Brando', 'Al Pacino', 'James Caan', 'Diane Keaton', 'Robert Duvall']);
$zoolander = new Movie('Zoolander', 8, new DateTime('2001-9-28'), 'Ben Stiller', ['Ben Stiller', 'Owen Wilson', 'Will Ferrell', 'Christine Taylor']);
$scarface = new Movie('Scarface', 11, new DateTime('1983-12-01'), 'Brian De Palma', ['Al Pacino', 'Steven Bauer', 'Michelle Pfeiffer', 'Mary Elizabeth Mastrantonio']); // 11 of rating is still too low

$movies = [$theGodFather, $zoolander, $scarface];
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
