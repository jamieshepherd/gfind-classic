<?php
    require_once(COREPATH."loader.php");
    require_once(VIEWPATH."html/html_header.php");
?>

<menu>
    <ul>
        <?php
        $nav->newItem("add","Add new","/new");
        $nav->newItem("random","Random","/random");
        $nav->newItem("contact","Contact","http://about.me/jamieshepherd");
        $nav->newItem("github","Developers","http://www.github.com/jamieshepherd/gfind");
        ?>
    </ul>
</menu>

<article>
    <h1>Add a new game</h1>
    <h2>Thanks for helping out!</h2>
    <p>Please fill out the information below to add a new game to our database. Ensure that you read the guidelines or your game page might not be accepted. Games are individually reviewed before accepted.</p>
    <form action="/app/core/actions/game_add_new.php" method="post" enctype="multipart/form-data">
    <hr>
        <label>Game image (1024 x 300, under 250kb, .jpg)</label>

        <img id="imgpreview" src="http://placehold.it/1024x300" alt="Preview of the game header" width="1024" height="300">
        <input type="file" id="imgfile" name="gameimage"
               data-validation="required mime size extension"
               data-validation-max-size="250kb"
               data-validation-allowing="jpg"
               data-validation-error-msg="You have to upload an image of file type 'jpg' under 250kb"
        />

                <script type='text/javascript'>
                    $(window).load(function(){function e(e){if(e.files&&e.files[0]){var t=new FileReader;t.onload=function(e){$("#imgpreview").attr("src",e.target.result)};t.readAsDataURL(e.files[0])}}$("#imgfile").change(function(){e(this)})})
                </script>

    <hr>

        <label>Game title</label>
        <input type="text" name="title" placeholder="e.g. Battlefield 4" data-validation="required">
        <label>Developer</label>
        <input type="text" name="developer" placeholder="e.g. EA Digital Illusions CE" data-validation="required">
        <label>Publisher</label>
        <input type="text" name="publisher" placeholder="e.g. Electronic Arts" data-validation="required">
        <label>Genre <strong>(Pick at least one)</strong></label>
            <ul>
                <li><input type="checkbox" name="genre[]" value="FPS" data-validation="checkbox_group" data-validation-qty="min1"> FPS</li>
                <li><input type="checkbox" name="genre[]" value="Adventure"> Adventure</li>
                <li><input type="checkbox" name="genre[]" value="Strategy"> Strategy</li>
                <li><input type="checkbox" name="genre[]" value="MMO"> MMO</li>
                <li><input type="checkbox" name="genre[]" value="MOBA"> MOBA</li>
                <li><input type="checkbox" name="genre[]" value="RPG"> RPG</li>
                <li><input type="checkbox" name="genre[]" value="Third-Person"> Third-Person</li>
                <li><input type="checkbox" name="genre[]" value="Tower Defence"> Tower Defence</li>
                <li><input type="checkbox" name="genre[]" value="Sandbox"> Sandbox</li>
                <li><input type="checkbox" name="genre[]" value="Puzzle"> Puzzle</li>
                <li><input type="checkbox" name="genre[]" value="Simulation"> Simulation</li>
                <li><input type="checkbox" name="genre[]" value="Fighting"> Fighting</li>
                <li><input type="checkbox" name="genre[]" value="Sports"> Sports</li>
                <li><input type="checkbox" name="genre[]" value="Racing"> Racing</li>
                <li><input type="checkbox" name="genre[]" value="Other"> Other</li>
            </ul>
        <label>Platforms <strong>(Pick at least one)</strong></label>
            <ul>
                <li><input type="checkbox" name="platform[]" value="Windows" data-validation="checkbox_group" data-validation-qty="min1"> Windows</li>
                <li><input type="checkbox" name="platform[]" value="Mac"> Mac OS</li>
                <li><input type="checkbox" name="platform[]" value="Linux"> Linux</li>
                <li><input type="checkbox" name="platform[]" value="Xbox"> Xbox</li>
                <li><input type="checkbox" name="platform[]" value="X360"> Xbox 360</li>
                <li><input type="checkbox" name="platform[]" value="XBO"> Xbox One</li>
                <li><input type="checkbox" name="platform[]" value="XBLA"> XBLA</li>
                <li><input type="checkbox" name="platform[]" value="PS1"> PlayStation</li>
                <li><input type="checkbox" name="platform[]" value="PS2"> PlayStation 2</li>
                <li><input type="checkbox" name="platform[]" value="PS3"> Playstation 3</li>
                <li><input type="checkbox" name="platform[]" value="PS4"> PlayStation 4</li>
                <li><input type="checkbox" name="platform[]" value="PSP"> PSP</li>
                <li><input type="checkbox" name="platform[]" value="PSVita"> PS Vita</li>
                <li><input type="checkbox" name="platform[]" value="Wii"> Wii</li>
                <li><input type="checkbox" name="platform[]" value="WiiU"> WiiU</li>
                <li><input type="checkbox" name="platform[]" value="NES"> NES</li>
                <li><input type="checkbox" name="platform[]" value="N64"> N64</li>
                <li><input type="checkbox" name="platform[]" value="GBA"> GameBoy Advance</li>
                <li><input type="checkbox" name="platform[]" value="iOS"> iOS</li>
                <li><input type="checkbox" name="platform[]" value="Droid"> Android</li>
                <li><input type="checkbox" name="platform[]" value="Other"> Other</li>
            </ul>
        <label>Engine</label>
        <input type="text" name="engine" placeholder="e.g. Unreal Engine 3">
        <label>Website <strong>(Full URL)</strong></label>
        <input type="text" name="website" placeholder="http://www.example.com/" data-validation="url">
        <label>Video media <strong>(11 character Youtube code)</strong></label>
        <input type="text" name="video" placeholder="e.g. Q8lngIFXRi4" data-validation="length" data-validation-length="11-11" data-validation-optional="true">
        <label>Description / Synopsis</label>
        <textarea rows="20" name="description" type="text" placeholder="Enter as much detail about the game as you can. Storyline, history, development, critical reception." data-validation="required"></textarea>
        <hr>
        <input type="submit" value="Submit">
    </form>
</article>

    <script>
        $.validate({
            borderColorOnError : '#F60',
            errorMessagePosition : 'top',
            scrollToTopOnError : false,
            modules : 'file'
        });
    </script>

<?php require_once(VIEWPATH."html/html_end.php"); ?>