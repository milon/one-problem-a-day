---
extends: _layouts.post
section: content
title: Reduce array size to the half
problemUrl: https://leetcode.com/problems/reduce-array-size-to-the-half/
date: 2022-08-18
categories: [array-and-hashmap]
---

We will count the values, then sort them. Then we start removing item from the most common elements and count them. When the removed elements reach more than half of the input array, we return the count of the removed elements.

```python
class Solution:
    def minSetSize(self, arr: List[int]) -> int:
        half = len(arr)//2
        count = collections.Counter(arr).most_common()

        res = 0
        removed = 0
        for num, cnt in count:
            removed += cnt
            res += 1
            if removed >= half:
                return res
```

Time Complexity: `O(n*log(n))` <br/>
Space Complexity: `O(n)`