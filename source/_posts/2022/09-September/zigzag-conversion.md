---
extends: _layouts.post
section: content
title: Zigzag conversion
problemUrl: https://leetcode.com/problems/zigzag-conversion/
date: 2022-09-01
categories: [array-and-hashmap]
---

We will create an array with empty string for each row. Then we also have a direction value, which will be down at the beginning. Then we start from position 0, add items in each row until we reach the last row, then change our direction to up, and add items to each row. We will continue this until we reach end of the string, then we combine each row to a string and return that value.

```python
class Solution:
    def convert(self, s: str, numRows: int) -> str:
        if numRows == 1:
            return s
        
        rows = ["" for i in range(numRows)]
        pos = 0
        down = True
        
        for ch in s:
            rows[pos] += ch
            pos += 1 if down else -1
            if pos == numRows-1 or pos == 0:
                down = not down
        
        return ''.join(rows)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`