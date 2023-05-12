---
extends: _layouts.post
section: content
title: Letter tile possibilities
problemUrl: https://leetcode.com/problems/letter-tile-possibilities/
date: 2023-05-12
categories: [backtracking]
---

We will generate all possible permutations using backtracking and then count the number of unique permutations. 

```python
class Solution:
    def numTilePossibilities(self, tiles: str) -> int:
        seen, res = set(), set()
        
        def backtrack(seen, res, curr):
            if curr != '' and curr not in res:
                res.add(curr)
		
            for index in range(len(tiles)):
                if index not in seen:
                    seen.add(index)
                    backtrack(seen, res, curr + tiles[index])
                    seen.remove(index)
        
        backtrack(seen, res, '')
        return len(res)
```

Time complexity: `O(n!)` <br/>
Space complexity: `O(n)`

We can use python's `itertools.permutations` to generate all possible permutations and then count the number of unique permutations. 

```python
class Solution:
    def numTilePossibilities(self, tiles: str) -> int:
        return len(set(itertools.permutations(tiles, len(tiles))))
```