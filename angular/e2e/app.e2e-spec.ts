import { AngulPage } from './app.po';

describe('angul App', () => {
  let page: AngulPage;

  beforeEach(() => {
    page = new AngulPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
