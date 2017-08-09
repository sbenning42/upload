import { TestBed, inject } from '@angular/core/testing';

import { UserPictureService } from './user-picture.service';

describe('UserPictureService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserPictureService]
    });
  });

  it('should be created', inject([UserPictureService], (service: UserPictureService) => {
    expect(service).toBeTruthy();
  }));
});
