<html>
<head>
    <title>Game Development Tutorial</title>

    <script src = "jquery.js" type = "text/javascript"></script>
    <script src = "keyboard.js" type = "text/javascript"></script>
    <script src = "utility.js" type = "text/javascript"></script>
    <script src = "canvas.js" type = "text/javascript"></script>
    <script src = "animate.js" type = "text/javascript"></script>
    <script src = "spritesheet.js" type = "text/javascript"></script>
    <script src = "sprite.js" type = "text/javascript"></script>
    <script src = "world.js" type = "text/javascript"></script>

    <script language = "javascript">

        var dog_angle = 0;

        var Context = null;
        var BLOCK_W = 32;
        var BLOCK_H = 32;

        var dog_x = 64;
        var dog_y = 32;

        var dog_rotate = 0;

        var wall = new Sprite("wall.png");
        var water = new Sprite("water.png");
        var dog = new Sprite("dog-sprite-sheet.png");
        var dog2 = new Sprite("dog-sprite-sheet.png");

        var spritesheet = new Spritesheet("dog-sprite-sheet.png");
        var dog3 = new Sprite(spritesheet);
        var dog4 = new Sprite(spritesheet);
        var dog5 = new Sprite(spritesheet);

        var dog_is_moving = false;
        var dog_direction = 0;

        var map = [ 0,0,0,0,0,0,0,0,0,0,
                    0,0,1,1,1,0,1,0,0,0,
                    0,0,1,1,1,0,0,0,0,0,
                    0,0,1,1,1,1,0,0,0,0,
                    0,0,0,0,1,1,1,0,0,0,
                    0,0,0,0,1,1,1,1,1,0,
                    0,0,0,0,0,0,1,1,1,1,
                    0,0,1,1,0,0,0,0,1,1,
                    0,0,0,0,0,1,0,0,0,0,
                    0,0,0,0,0,0,0,0,0,0 ];

        var mapIndex = 0;

        $(document).ready(function() {

            Context = new HTML("game", 640, 480);

            InitializeKeyboard();

            DisableScrollbars();

            InitializeAnimationCounters();

        });

        $(window).load(function() {

        });

        setInterval(function() {

            ResetAnimationCounter();

            DrawMap();

            dog_is_moving = false;

            dog_direction = 0;

            if (key.left) { dog_x -= 1;  dog_direction |= DIR_W; dog_is_moving = true; }
            if (key.right) { dog_x += 1; dog_direction |= DIR_E; dog_is_moving = true; }
            if (key.up) { dog_y -= 1;    dog_direction |= DIR_N; dog_is_moving = true; }
            if (key.down) { dog_y += 1;  dog_direction |= DIR_S; dog_is_moving = true; }

            if (key.w) { /* ... */ }
            if (key.s) { /* ... */ }
            if (key.a) { /* ... */ }
            if (key.d) { /* ... */ }

            // Animated characters
            var dog_seq = 0;

            if (dog_is_moving)
            {
                if (dog_direction & DIR_W) dog_seq = [33,34,35,36];
                if (dog_direction & DIR_E) dog_seq = [1,2,3,4];
                if (dog_direction & DIR_N) dog_seq = [49,50,51,52];
                if (dog_direction & DIR_S) dog_seq = [17,18,19,20];
                if (dog_direction & DIR_N && dog_direction & DIR_E) dog_seq = [57,58,59,60];
                if (dog_direction & DIR_N && dog_direction & DIR_W) dog_seq = [41,42,43,44];
                if (dog_direction & DIR_S && dog_direction & DIR_E) dog_seq = [9,10,11,12];
                if (dog_direction & DIR_S && dog_direction & DIR_W) dog_seq = [25,26,27,28];

                // Finally, animate the dog.
                dog.draw(dog_x, dog_y, dog_seq);
            }
            else
            {
                dog.draw(dog_x, dog_y, 0);
            }

            /*
            dog.draw(128, 128, [17,18,19,20]);
            dog.draw(96, 96, 0);
            dog.rotAnim(32, 32, [1,2,3,4], dog_rotate++);
            dog3.rot(100, 100, dog_rotate);
            dog3.rot(120, 100, -dog_rotate);
            */


        }, 12);

    </script>
</head>
<body>

    <canvas id = "game"></canvas>

</body>
</html>