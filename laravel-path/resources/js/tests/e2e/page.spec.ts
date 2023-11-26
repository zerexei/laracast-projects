import { test, expect } from '@playwright/test';

import { sum } from '@/Utils';

test.use({
    colorScheme: 'dark' // or 'light'
});

// test.beforeEach(async ({ page }) => {
//     await page.goto('/');
// });


test('Should load welcome page', async ({ page }) => {
    await page.goto('/');
    await expect(page).toHaveScreenshot();
});

test('Should load App page', async ({ page }) => {
    await page.goto('/dashboard');
    await expect(page).toHaveScreenshot();
});

test("adds 1 + 2 to equal 3", () => {
    expect(sum(1, 2)).toBe(3);
});
