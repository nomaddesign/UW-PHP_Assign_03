<?php

// Store into local database (psudo code, don't assume the following code works)
$dao = new MyAwesomeDao();
$github = new GitHubApi();
$gists = $github->getPublicGists();

foreach($gists as $gist) {
    $gistEntity = new Gist();
    $dao->insert($gistEntity);
}
?>