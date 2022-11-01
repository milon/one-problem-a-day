---
extends: _layouts.post
section: content
title: Letter tile possibilities
problemUrl: https://leetcode.com/problems/letter-tile-possibilities/
date: 2022-11-01
categories: [backtracking]
---

We will use DFS to generate all possible strings. We will generate all the strings, put it in a set for remove duplication and finally return the count as the result.

```python
class Solution:
    def numTilePossibilities(self, tiles: str) -> int:
        res = set()
        
        def dfs(path, tiles):
            if path:
                res.add(path)
            for i in range(len(tiles)):
                dfs(path+tiles[i], tiles[:i] + tiles[i+1:])
                
        dfs('', tiles)
        
        return len(res)
```

Time complexity: `O(n!)` <br/>
Space complexity: `O(n!)`