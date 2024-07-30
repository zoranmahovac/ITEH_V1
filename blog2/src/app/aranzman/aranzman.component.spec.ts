import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AranzmanComponent } from './aranzman.component';

describe('AranzmanComponent', () => {
  let component: AranzmanComponent;
  let fixture: ComponentFixture<AranzmanComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [AranzmanComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AranzmanComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
