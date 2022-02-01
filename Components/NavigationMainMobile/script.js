import $ from 'jquery'

class NavigationMainMobile extends window.HTMLElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.resolveElements()
    this.bindFunctions()
    this.bindEvents()
  }

  resolveElements () {
    this.$window = $(window)
    this.$document = $(document)
    this.$headerWrapper = $('.wrapper', this)
    this.$headerContainer = $('.container', this)
    this.$logo = $('.logoHeader', this)
  }

  bindFunctions () {
    this.showLogo = this.showLogo.bind(this)
    this.colorLogo = this.colorLogo.bind(this)
  }

  bindEvents () {
    this.$window.on('scroll', this.showLogo)
    this.$window.on('scroll', this.colorLogo)
  }

  showLogo (e) {
    const $scroll = this.$window.scrollTop()

    if ($scroll > 0) {
      this.$headerWrapper.fadeIn()
      // this.$header.addClass('wrapper--fadeIn')
      // this.$header.removeClass('wrapper--fadeOut')
    } else {
      this.$headerWrapper.fadeOut()
      // this.$header.removeClass('wrapper--fadeIn')
      // this.$header.addClass('wrapper--fadeOut')
    }
  }

  colorLogo (e) {
    // const $scroll = this.$window.scrollTop()
    const $scroll = 100 * this.$window.scrollTop() / (this.$document.innerHeight() - this.$window.innerHeight())

    if ($scroll > 22.5) {
      this.$logo.addClass('logoHeader--blue')
      this.$headerWrapper.addClass('wrapper--backgroundWhite')
      this.$headerContainer.addClass('container--borderBlue')
    } else {
      this.$logo.removeClass('logoHeader--blue')
      this.$headerWrapper.removeClass('wrapper--backgroundWhite')
      this.$headerContainer.removeClass('container--borderBlue')
    }
  }
}

window.customElements.define('flynt-navigation-main', NavigationMainMobile, { extends: 'nav' })
