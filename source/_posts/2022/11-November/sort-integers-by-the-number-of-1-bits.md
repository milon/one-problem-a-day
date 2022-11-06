---
extends: _layouts.post
section: content
title: Sort integers by the number of 1 bits
problemUrl: https://leetcode.com/problems/sort-integers-by-the-number-of-1-bits/
date: 2022-11-06
categories: [bit-manipulation]
---

We will iterate over all the numbers in of the array and count the 1 bits and store it in a map. Then we will sort the map by the value and return the keys.

```python
class Solution:
    def sortByBits(self, arr: List[int]) -> List[int]:
        def count1Bits(n):
            count = 0
            while n:
                count += n & 1
                n >>= 1
            return count

        pairs = [(count1Bits(i), i) for i in arr]
        pairs.sort()
        
        return [i for cnt, i in pairs]
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`