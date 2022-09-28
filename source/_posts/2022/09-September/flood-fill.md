---
extends: _layouts.post
section: content
title: Flood fill
problemUrl: https://leetcode.com/problems/flood-fill/
date: 2022-09-28
categories: [graph]
---

We will start from the source row and column and visit all connected position with the same color using DFS and color them with our new color. We will keep a visited set to avoid repetation of the same grid position twice.

```python
class Solution:
    def floodFill(self, image: List[List[int]], sr: int, sc: int, color: int) -> List[List[int]]:
        ROWS, COLS = len(image), len(image[0])
        initialColor = image[sr][sc]
        visited = set()
        
        def dfs(r, c):
            if r<0 or r>=ROWS or c<0 or c>=COLS or image[r][c] != initialColor or (r, c) in visited:
                return
            
            image[r][c] = color
            visited.add((r, c))
            
            dfs(r+1, c)
            dfs(r-1, c)
            dfs(r, c+1)
            dfs(r, c-1)
            
        dfs(sr, sc)
        return image
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`