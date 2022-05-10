$(function () {
    if (libphonenumber !== undefined) {
        $(".phone-input").keypress(function (ev) {
            var $target = $(ev.target);
            var current = $target.val().replace(/\s/g, "");
            if (!current.startsWith("+")) {
                current = `+${current}`;
            }
            $target.val(new libphonenumber.AsYouType().input(current));
            return;
        });
    }
    return;
});