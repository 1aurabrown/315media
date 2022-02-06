import $ from 'jquery'

class NavigationMain extends window.HTMLElement {
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
      // this.$headerWrapper.fadeIn()
      this.$headerWrapper.addClass('wrapper--fadeIn')
      this.$headerWrapper.removeClass('wrapper--fadeOut')
    } else {
      // this.$headerWrapper.fadeOut()
      this.$headerWrapper.removeClass('wrapper--fadeIn')
      this.$headerWrapper.addClass('wrapper--fadeOut')
    }
  }

  colorLogo (e) {
    const $scroll = this.$window.scrollTop()
    // const $scroll = 100 * this.$window.scrollTop() / (this.$document.innerHeight() - this.$window.innerHeight())
    const $bannerHeight = this.$window.innerHeight()

    if ($scroll >= $bannerHeight) {
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

window.customElements.define('flynt-navigation-main', NavigationMain, { extends: 'nav' })
