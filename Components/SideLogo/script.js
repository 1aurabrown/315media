import $ from 'jquery'

class SideLogo extends window.HTMLElement {
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
    this.$logo = $('.logo', this)
  }

  bindFunctions () {
    this.offsetLogo = this.offsetLogo.bind(this)
  }

  bindEvents () {
    this.$window.on('scroll', this.offsetLogo)
  }

  offsetLogo (e) {
    const $scroll = this.$window.scrollTop()

    if ($scroll > 0) {
      this.$logo.addClass('logo--addRose')
      this.$logo.removeClass('logo--removeRose')
    } else {
      this.$logo.removeClass('logo--addRose')
      this.$logo.addClass('logo--removeRose')
    }
  }
}

window.customElements.define('flynt-side-logo', SideLogo, { extends: 'div' })
