describe('template spec', () => {

  beforeEach(() => {
    cy.visit('/')
  })

  it('Select categories', () => {
    cy.contains('necessitatibus').click()
  })
  it('Select tags', () => {
    cy.contains('minus').click()
  })
  it('Select product', () => {
    let item = cy.get('[data-testid="products-list"]')
      .find('li')
      .eq(0)
      .within(() => {
        cy.contains('+').click()
        cy.contains('Show more').click()
      })
  })


})