---
extends: _layouts.post
section: content
title: Number of pairs of interchangeable rectangles
problemUrl: https://leetcode.com/problems/number-of-pairs-of-interchangeable-rectangles/
date: 2022-12-09
categories: [array-and-hashmap]
---

We will use a hash map to store the number of rectangles with each width and height. Then we will iterate over the hash map and count the number of pairs of rectangles that can be interchanged.

```python
class Solution:
    def interchangeableRectangles(self, rectangles: List[List[int]]) -> int:
        lookup = collections.defaultdict(int)
        for width, height in rectangles:
            lookup[width/height] += 1

        res = 0
        for num in lookup.values():
            res += num * (num-1) // 2
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`