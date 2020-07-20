$.fn.extend({
    treed: function (o) {

        let openedClass = 'fa-minus-sign';
        let closedClass = 'fa-plus-sign';

        if (typeof o != 'undefined') {
            if (typeof o.openedClass != 'undefined') {
                openedClass = o.openedClass;
            }
            if (typeof o.closedClass != 'undefined') {
                closedClass = o.closedClass;
            }
        }

        //initialize each of the top levels
        let tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            let branch = $(this); //li with children ul
            branch.prepend("<i class='indicator fa " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this === e.target) {
                    let icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function () {
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        //fire event to open branch if the li contains an anchor instead of text

        tree.find('.branch>a').each(function () {
            $(this).on('click', function () {
                console.log($(this).attr('href'));
                window.location.href = $(this).attr('href');
            });
            /*
            $(this).on('click', function (e) {
                //$(this).closest('li').click();
                console.log("a click");
                //e.preventDefault();
            });
             */
        });

        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                //e.preventDefault();
            });
        });
    }
});