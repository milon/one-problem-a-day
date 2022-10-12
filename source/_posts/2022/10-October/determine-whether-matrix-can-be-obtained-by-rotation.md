---
extends: _layouts.post
section: content
title: Determine whether matrix can be obtained by rotation
problemUrl: https://leetcode.com/problems/determine-whether-matrix-can-be-obtained-by-rotation/
date: 2022-10-12
categories: [array-and-hashmap]
---

We will rotate the matrix 4 times and check if it is equal to the target matrix.

```python
class Solution:
    def findRotation(self, mat: List[List[int]], target: List[List[int]]) -> bool:
        for i in range(4):
            if mat == target: 
                return True
            mat = list(map(lambda a: list(reversed(a)), zip(*mat)))
        return False
```

Time complexity: O(n^2) <br/>
Space complexity: O(n^2)