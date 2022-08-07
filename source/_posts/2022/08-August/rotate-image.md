---
extends: _layouts.post
section: content
title: Rotate image
problemUrl: https://leetcode.com/problems/rotate-image/
date: 2022-08-07
categories: [math-and-geometry]
---

We will save the topleft to a temporary variable and then move the bottom left to top left, then move the bottom right to bottom left and move the top right to bottom right and then finally move the temporary top left to top right. We will repeat the whole process until left and right meet together.

```python
class Solution:
    def rotate(self, matrix: List[List[int]]) -> None:
        l, r = 0, len(matrix)-1
        while l < r:
            for i in range(r-l):
                top, bottom = l, r
                
                # save the topleft
                topLeft = matrix[top][l+i]
                
                # move bottom left into top left
                matrix[top][l + i] = matrix[bottom - i][l]
                
                # move bottom right into bottom left
                matrix[bottom - i][l] = matrix[bottom][r - i]

                # move top right into bottom right
                matrix[bottom][r - i] = matrix[top + i][r]

                # move top left into top right
                matrix[top + i][r] = topLeft
            
            r -= 1
            l += 1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`