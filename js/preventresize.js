//Prevent or disable CTRL + scroll zoom in/out
                (function () {

                    /**
                     * Main stopscrollwheelzoom constructor
                     */
                    let SSWZ = function () {

                        /**
                         * Handler for scroll- control must be pressed.
                         * @param e
                         */
                        this.keyScrollHandler = function (e) {
                            if (e.ctrlKey) {
                                e.preventDefault();
                                return false;
                            }
                        }
                    };

                    if (window === top) {
                        let sswz = new SSWZ();
                        window.addEventListener('wheel', sswz.keyScrollHandler, { passive: false });
                    }

                })();