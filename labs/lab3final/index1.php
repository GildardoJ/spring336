<?php
//this is a comment
function setup() {
  // Players take a seat at a table.
  seatPlayers();

  // Dealer is selected.
  selectDealer();

  // Cards taken out of box.
  takeCardsOutOfBox();

  // Dealer shuffles the cards.
  shuffleCards();

  // Player to the right of the deal cuts the cards.
  cutCards();

  // Dealer deals cards according to the rules, starting to the left, and around to him or herself
  deal();
}

function seatPlayers() {  
  return true;
}

function selectDealer() {  
  return true;
}

function takeCardsOutOfBox() {  
  return true;
}

function shuffleCards() {  
  return true;
}

function cutCards() {  
  return true;
}

function deal() {  
  return true;
}
?>

Obviously, we don't need all of these, but this is more to illustrate the point that the program design comes directly from the analysis.

Parameters and Returns
Once we have a structure, we can of course, keep driving down further until we feel like we have an "atomic" design--one that is constructed of smaller, manageable parts.

So how will this all work together? It is easier to start down at the bottom then work our way up for this cut.

What information does each function at the bottom need to take in? What will the functions that use it need back? These are the questions for each one of our functions.

So let's take an example.

<?php

function setup() {
  // ...other steps

  // Dealer shuffles the cards.
  shuffleCards();

  // ...other steps
}

function shuffleCards() {  
  return true;
}
?>

What does shuffleCards need? It needs a deck. What should it return? A shuffled deck. So let's do that.

<?php

function setup() {
  $deck = [];

  // ...other steps, one of which adds cards to the deck


  // Dealer shuffles the cards.
  shuffleCards($deck);

  // ...other steps
}

function shuffleCards($unshuffledDeck) {  
  $shuffledDeck = [];

  // Do the shuffling.

  return $shuffledDeck;
}
?>