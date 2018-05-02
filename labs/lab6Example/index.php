<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    
    
    <body>

    <div class="container">
        <h1>Search for an Artist</h1>
        <p>Type an artist name and click on "Search". Then, click on any album from the results to play 30 seconds of its first track.</p>
        <form id="search-form">
            <input type="text" id="query" value="" class="form-control" placeholder="Type an Artist Name"/>
            <input type="submit" id="search" class="btn btn-primary" value="Search" />
        </form>
        <div id="results"></div>
    </div>
    <script id="results-template" type="text/x-handlebars-template">
        {{#each albums.items}}
        <div style="background-image:url({{images.0.url}})" data-album-id="{{id}}" class="cover"></div>
        {{/each}}
    </script>
    
    
    </body>
</html>