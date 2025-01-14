document.addEventListener('DOMContentLoaded', () => {
    function calculateDistance(elem, mouseX, mouseY) {
        return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offsetLeft + elem.clientWidth / 2), 2) + Math.pow(mouseY - (elem.offsetTop + elem.clientHeight / 2), 2)))
    }

    function magnetize(el, e) {
        let mouseCurrent = {
            mX: e.pageX,
            mY: e.pageY
        };
        const customDist = 300;
        const centerX = el.offsetLeft + el.clientWidth / 2;
        const centerY = el.offsetTop + el.clientHeight / 2;
        let deltaX = Math.floor((centerX - mouseCurrent.mX) * -130) / 130;
        let deltaY = Math.floor((centerY - mouseCurrent.mY) * -130) / 130;
        let distance = calculateDistance(el, mouseCurrent.mX, mouseCurrent.mY);
        this.scrollEl = !1;
        if (distance < customDist) {
            TweenMax.to(el, 0.4, {
                y: deltaY,
                x: deltaX,
                scale: 1.4
            });
            el.classList.add('magnet')
        } else {
            TweenMax.to(el, 0.7, {
                y: 0,
                x: 0,
                scale: 1
            });
            el.classList.remove('magnet')
        }
    }
    class Cursor {
        constructor(el) {
            this.bind();
            this.cursor = el;
            this.cursorCircle = el.querySelector('.circle_wrap');
            this.mouseCurrent = {
                x: 0,
                y: 0
            };
            this.mouseLast = {
                x: this.mouseCurrent.x,
                y: this.mouseCurrent.y
            };
            this.rAF = undefined;
            this.amt = 0.15;
            this.currentCursorType = 'default';
            this.disabledChangeColor = !0;
            this.currentColor = 'black';
            this.noDelay = !1;
            this.animCursor = !1;
            this.getMousePosition = this.getMousePosition.bind(this);
            this.drawOnScroll = this.drawOnScroll.bind(this)
        }
        lerp(start, end, amt) {
            return (1 - amt) * start + amt * end
        }
        bind() {
            ['getMousePosition', 'run'].forEach(fn => (this[fn] = this[fn].bind(this)))
        }
        clearAllClasses(e) {
            if (this.cursor.classList.contains('view_more_cursor'))
                this.cursor.classList.remove('view_more_cursor');
            if (this.cursor.classList.contains('open_cursor'))
                this.cursor.classList.remove('open_cursor');
            if (this.cursor.classList.contains('read_article_cursor'))
                this.cursor.classList.remove('read_article_cursor');
            if (this.cursor.classList.contains('view_cursor'))
                this.cursor.classList.remove('view_cursor');
            if (this.cursor.classList.contains('download_cursor'))
                this.cursor.classList.remove('download_cursor');
            if (this.cursor.classList.contains('active'))
                this.cursor.classList.remove('active');
            if (this.cursor.classList.contains('scroll_cursor'))
                this.cursor.classList.remove('scroll_cursor');
            if (this.cursor.classList.contains('scroll_cursor_txt'))
                this.cursor.classList.remove('scroll_cursor_txt');
            if (this.cursor.classList.contains('scroll_view_more_txt'))
                this.cursor.classList.remove('scroll_view_more_txt');
            if (this.cursor.classList.contains('white_cursor'));
            this.cursor.classList.remove('white_cursor');
            if (this.cursor.classList.contains('close_cursor'))
                this.cursor.classList.remove('close_cursor');
            if (this.cursor.classList.contains('home_cursor'))
                this.cursor.classList.remove('home_cursor');
            if (this.cursor.classList.contains('view_txt_cursor'))
                this.cursor.classList.remove('view_txt_cursor');
			if (this.cursor.classList.contains('call_cursor'))
                this.cursor.classList.remove('call_cursor');
			if (this.cursor.classList.contains('messenger_cursor'))
                this.cursor.classList.remove('messenger_cursor')
        }
        getMousePosition(e) {
            let isDefault = !0;
            const bgColorBody = document.querySelector('.change_color_page');
            let currentElement = typeof e.target.closest === 'function' ? e.target : null;
            let colorCustomAtrCheck = currentElement?.closest('*[data-custom-color]')?.getAttribute('data-custom-color') == 'off_white' || currentElement?.getAttribute('data-custom-color') == 'off_white';
            this.mouseCurrent = {
                x: e.clientX,
                y: e.clientY
            };
            this.scrollEl = !1;
            if (!this.disabledChangeColor) {
                if (bgColorBody == null) {
                    if (currentElement?.closest('*[data-color]') !== null) {
                        if (currentElement?.closest('*[data-color]')?.getAttribute('data-color') == 'off_white') {
                            this.currentColor = 'black'
                        } else {
                            this.currentColor = 'white'
                        }
                    }
                } else {
                    if (currentElement?.closest('*[data-custom-color]') !== null || currentElement?.getAttribute('data-custom-color') !== null) {
                        if (colorCustomAtrCheck) {
                            this.currentColor = 'black'
                        } else {
                            this.currentColor = 'white'
                        }
                    } else {
                        if (bgColorBody.classList.contains('white')) {
                            this.currentColor = 'black'
                        } else {
                            this.currentColor = 'white'
                        }
                    }
                }
            }
            this.clearAllClasses();
            if (currentElement !== undefined && currentElement !== null) {
                if (currentElement.classList.contains('white_cursor') || currentElement.closest('.white_cursor') || currentElement.classList.contains('alternative_color') || currentElement.closest('.alternative_color') || currentElement.classList.contains('header_bar_open_white') || currentElement.closest('.header_bar_open_white')) {
                    this.currentCursorType = 'white_cursor';
                    if (!this.cursor.classList.contains('white_cursor'))
                        this.cursor.classList.add('white_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('no_text_cursor') || currentElement.closest('.no_text_cursor')) {
                    this.currentCursorType = 'no_text_cursor';
                    if (!this.cursor.classList.contains('no_text_cursor'))
                        this.cursor.classList.add('no_text_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('view_more_cursor') || currentElement.closest('.view_more_cursor')) {
                    this.currentCursorType = 'view_more_cursor';
                    if (!this.cursor.classList.contains('view_more_cursor'))
                        this.cursor.classList.add('view_more_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('view_txt_cursor') || currentElement.closest('.view_txt_cursor')) {
                    this.currentCursorType = 'view_txt_cursor';
                    if (!this.cursor.classList.contains('view_txt_cursor'))
                        this.cursor.classList.add('view_txt_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('open_cursor') || currentElement.closest('.open_cursor')) {
                    this.currentCursorType = 'open_cursor';
                    if (!this.cursor.classList.contains('open_cursor'))
                        this.cursor.classList.add('open_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('read_article_cursor') || currentElement.closest('.read_article_cursor')) {
                    this.currentCursorType = 'read_article_cursor';
                    if (!this.cursor.classList.contains('read_article_cursor'))
                        this.cursor.classList.add('read_article_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('view_cursor') || currentElement.closest('.view_cursor')) {
                    this.currentCursorType = 'view_cursor';
                    if (!this.cursor.classList.contains('view_cursor'))
                        this.cursor.classList.add('view_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('download_cursor') || currentElement.closest('.download_cursor')) {
                    this.currentCursorType = 'download_cursor';
                    if (!this.cursor.classList.contains('download_cursor'))
                        this.cursor.classList.add('download_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('scroll_cursor') || currentElement.closest('.scroll_cursor')) {
                    this.currentCursorType = 'scroll_cursor';
                    if (!this.cursor.classList.contains('scroll_cursor'))
                        this.cursor.classList.add('scroll_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('scroll_cursor_txt') || currentElement.closest('.scroll_cursor_txt')) {
                    this.currentCursorType = 'scroll_cursor_txt';
                    if (!this.cursor.classList.contains('scroll_cursor_txt'))
                        this.cursor.classList.add('scroll_cursor_txt');
                    isDefault = !1
                }
                if (currentElement.classList.contains('scroll_view_more_txt') || currentElement.closest('.scroll_view_more_txt')) {
                    this.currentCursorType = 'scroll_view_more_txt';
                    if (!this.cursor.classList.contains('scroll_view_more_txt'))
                        this.cursor.classList.add('scroll_view_more_txt');
                    isDefault = !1
                }
                if (currentElement.classList.contains('close_cursor') || currentElement.closest('.close_cursor')) {
                    this.currentCursorType = 'close_cursor';
                    if (!this.cursor.classList.contains('close_cursor'))
                        this.cursor.classList.add('close_cursor');
                    isDefault = !1
                }
                if (currentElement.classList.contains('home_cursor') || currentElement.closest('.home_cursor')) {
                    this.currentCursorType = 'home_cursor';
                    if (!this.cursor.classList.contains('home_cursor'))
                        this.cursor.classList.add('home_cursor');
                    isDefault = !1
                }
				if (currentElement.classList.contains('call_cursor') || currentElement.closest('.call_cursor')) {
                    this.currentCursorType = 'call_cursor';
                    if (!this.cursor.classList.contains('call_cursor'))
                        this.cursor.classList.add('call_cursor');
                    isDefault = !1
                }
				if (currentElement.classList.contains('messenger_cursor') || currentElement.closest('.messenger_cursor')) {
                    this.currentCursorType = 'messenger_cursor';
                    if (!this.cursor.classList.contains('messenger_cursor'))
                        this.cursor.classList.add('messenger_cursor');
                    isDefault = !1
                }
                if (isDefault) {
                    this.currentCursorType = 'default';
                    this.clearAllClasses()
                } else {
                    let cursorTextWrap = this.cursor.querySelector(`.${this.currentCursorType}`);
                    let activeCursorText = cursorTextWrap ? cursorTextWrap.querySelectorAll('.text') : null;
                    if (!this.cursor.classList.contains('active'))
                        this.cursor.classList.add('active')
                }
            }
        }
        drawOnScroll() {
            const banner = document.querySelector('.hp_banner_wrap');
            if (banner) {
                const bannerHeight = banner.offsetHeight;
                const scrollHeight = Math.round(bannerHeight * 0.85) + window.innerHeight;
                const path = document.querySelector('#scroll_circle_init');
                const scrollTxt = banner.querySelector('.scroll_cursor_txt');
                const scrollViewMoreTxt = banner.querySelector('.scroll_view_more_txt');
                if (path) {
                    let pathLength = path.getTotalLength();
                    let scrollPercentage = window.pageYOffset / (scrollHeight - window.innerHeight);
                    let drawLength = pathLength * scrollPercentage;
                    path.style.strokeDashoffset = pathLength - drawLength;
                    if (scrollPercentage >= 0.99) {
                        path.style.strokeDasharray = "none"
                    } else {
                        path.style.strokeDasharray = pathLength + ' ' + pathLength
                    }
                }
                if ((window.pageYOffset + window.innerHeight) >= scrollHeight) {
                    scrollTxt.classList.remove('active');
                    scrollViewMoreTxt.classList.add('active');
                    if (!scrollViewMoreTxt.classList.contains('noa')) {
                        if (this.cursor.classList.contains('scroll_cursor_txt'))
                            this.cursor.classList.remove('scroll_cursor_txt');
                        if (!this.cursor.classList.contains('scroll_cursor'))
                            this.cursor.classList.add('scroll_cursor');
                        if (!this.cursor.classList.contains('active'))
                            this.cursor.classList.add('active');
                        if (!this.cursor.classList.contains('scroll_view_more_txt')) {
                            this.cursor.classList.add('scroll_view_more_txt')
                        }
                    }
                } else {
                    scrollViewMoreTxt.classList.remove('active');
                    scrollTxt.classList.add('active');
                    if (!scrollViewMoreTxt.classList.contains('noa')) {
                        if (this.cursor.classList.contains('scroll_view_more_txt'))
                            this.cursor.classList.remove('scroll_view_more_txt');
                        if (!this.cursor.classList.contains('scroll_cursor_txt')) {
                            this.cursor.classList.add('scroll_cursor_txt')
                        }
                    }
                }
                if (window.pageYOffset >= bannerHeight - Math.round(window.innerHeight * 0.25)) {
                    this.clearAllClasses()
                }
            }
        }
        checkIfMouseIsOnElement(e) {
            const elements = document.querySelectorAll('.view_more_cursor, .open_cursor, .read_article_cursor, .view_cursor, .download_cursor, .scroll_cursor, .call_cursor, .messenger_cursor');
            const cursorRect = this.cursor.getBoundingClientRect();
            this.scrollEl = !0;
            let isOnEl = !1;
            for (const el of elements) {
                let elRect = el.getBoundingClientRect();
                if (elRect.x <= window.innerWidth && elRect.right >= 0) {
                    if (elRect.x <= cursorRect.x && elRect.right >= cursorRect.x) {
                        isOnEl = !0
                    }
                }
            }
            if (!isOnEl) {
                this.currentCursorType = 'default';
                this.clearAllClasses()
            }
        }
        delayCheck(e) {
            if (this.currentCursorType === 'default') {
                this.noDelay = !0;
                this.amt = 0.3
            } else {
                this.animCursor = !1;
                this.noDelay = !1;
                this.amt = 0.3
            }
        }
        changeColor() {
            if (this.currentColor == 'black') {
                this.cursor.classList.add('black');
                this.cursor.classList.remove('white')
            } else {
                this.cursor.classList.add('white');
                this.cursor.classList.remove('black')
            }
        }
        run() {
            this.delayCheck();
            this.mouseLast.x = this.lerp(this.mouseLast.x, this.mouseCurrent.x, this.amt);
            this.mouseLast.y = this.lerp(this.mouseLast.y, this.mouseCurrent.y, this.amt);
            if (!this.disabledChangeColor) {
                this.changeColor()
            }
            this.cursor.style.transform = `translate3d(${this.mouseLast.x}px, ${this.mouseLast.y}px, 0)`;
            this.rAF = requestAnimationFrame(this.run)
        }
        requestAnimationFrame() {
            this.rAF = requestAnimationFrame(this.run)
        }
        addEvents() {
            window.addEventListener('mousemove', this.getMousePosition, !1);
            window.addEventListener('scroll', this.drawOnScroll, !1);
            window.addEventListener('resize', this.drawOnScroll, !1)
        }
        on() {
            this.addEvents();
            this.requestAnimationFrame()
        }
        init() {
            this.on();
            this.drawOnScroll()
        }
    }
    const elCursor = document.querySelector('.js-cursor-init');
    window.customCursor = new Cursor(elCursor);
    setTimeout(() => {
        window.customCursor.init()
    }, 1000);
    const svgItem = document.querySelector('#hp_logo_transparent');
    const maskedItem = document.querySelector('#mask_circle');
    const circleItem = document.querySelector('#circle_svg_hover');
    if (svgItem) {
        const svgPoint = svgItem.createSVGPoint();

        function cursorPoint(e, svg) {
            svgPoint.x = e.clientX;
            svgPoint.y = e.clientY;
            return svgPoint.matrixTransform(svg.getScreenCTM().inverse())
        }

        function update(svgPoints) {
            maskedItem.setAttribute('cx', svgPoints.x);
            maskedItem.setAttribute('cy', svgPoints.y);
            circleItem.setAttribute('cx', svgPoints.x);
            circleItem.setAttribute('cy', svgPoints.y)
        }
        window.addEventListener('mousemove', (e) => {
            update(cursorPoint(e, svgItem))
        }, !1);
        svgItem.addEventListener('mouseover', (e) => {
            document.querySelector('#mask_circle').classList.add('active');
            document.querySelector('#circle_svg_hover').classList.add('active')
        });
        svgItem.addEventListener('mouseout', (e) => {
            document.querySelector('#mask_circle').classList.remove('active');
            document.querySelector('#circle_svg_hover').classList.remove('active')
        })
    }
    /* document.addEventListener('touchmove', function(e) {
        e.preventDefault();
        let touchTarget = e.targetTouches[0];
        if (touchTarget) {
            update(cursorPoint(touchTarget, svgItem))
        }
    }, !1); */
});