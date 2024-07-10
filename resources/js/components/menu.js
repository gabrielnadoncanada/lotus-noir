export default (options = {}) => {
    let pointer = useTrackedPointer();

    return {
        init() {
            this.items = Array.from(this.$el.querySelectorAll('[role="menuitem"]'));
            this.$watch('open', () => {
                if (this.open) {
                    this.activeIndex = -1;
                }
            });
        },
        activeDescendant: null,
        activeIndex: null,
        items: null,
        open: options.open,
        focusButton() {
            this.$refs.button.focus();
        },
        onButtonClick() {
            this.open = !this.open;
            if (this.open) {
                this.$nextTick(() => {
                    this.$refs['menu-items'].focus();
                });
            }
        },
        onButtonEnter() {
            this.open = !this.open;
            if (this.open) {
                this.activeIndex = 0;
                this.activeDescendant = this.items[this.activeIndex].id;
                this.$nextTick(() => {
                    this.$refs['menu-items'].focus();
                });
            }
        },
        onArrowUp() {
            if (!this.open) {
                this.open = true;
                this.activeIndex = this.items.length - 1;
                this.activeDescendant = this.items[this.activeIndex].id;

                return;
            }

            if (this.activeIndex === 0) {
                return;
            }

            this.activeIndex = this.activeIndex === -1 ? this.items.length - 1 : this.activeIndex - 1;
            this.activeDescendant = this.items[this.activeIndex].id;
        },
        onArrowDown() {
            if (!this.open) {
                this.open = true;
                this.activeIndex = 0;
                this.activeDescendant = this.items[this.activeIndex].id;

                return;
            }

            if (this.activeIndex === this.items.length - 1) {
                return;
            }

            this.activeIndex = this.activeIndex + 1;
            this.activeDescendant = this.items[this.activeIndex].id;
        },
        onClickAway($event) {
            if (this.open) {
                const focusableSelector = [
                    '[contentEditable=true]',
                    '[tabindex]',
                    'a[href]',
                    'area[href]',
                    'button:not([disabled])',
                    'iframe',
                    'input:not([disabled])',
                    'select:not([disabled])',
                    'textarea:not([disabled])',
                ]
                    .map((selector) => `${selector}:not([tabindex='-1'])`)
                    .join(',');

                this.open = false;

                if (!$event.target.closest(focusableSelector)) {
                    this.focusButton();
                }
            }
        },

        onMouseEnter(evt) {
            pointer.update(evt);
        },
        onMouseMove(evt, newIndex) {
            // Only highlight when the cursor has moved
            // Pressing arrow keys can otherwise scroll the container and override the selected item
            if (!pointer.wasMoved(evt)) return;
            this.activeIndex = newIndex;
        },
        onMouseLeave(evt) {
            // Only unhighlight when the cursor has moved
            // Pressing arrow keys can otherwise scroll the container and override the selected item
            if (!pointer.wasMoved(evt)) return;
            this.activeIndex = -1;
        },
    };
}

function useTrackedPointer() {
    /** @type {[x: number, y: number]} */
    let lastPos = [-1, -1];

    return {
        /**
         * @param {PointerEvent} evt
         */
        wasMoved(evt) {
            let newPos = [evt.screenX, evt.screenY];

            if (lastPos[0] === newPos[0] && lastPos[1] === newPos[1]) {
                return false;
            }

            lastPos = newPos;
            return true;
        },

        /**
         * @param {PointerEvent} evt
         */
        update(evt) {
            lastPos = [evt.screenX, evt.screenY];
        },
    };
}
