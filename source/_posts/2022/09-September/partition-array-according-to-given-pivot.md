---
extends: _layouts.post
section: content
title: Partition array according to given pivot
problemUrl: https://leetcode.com/problems/partition-array-according-to-given-pivot/
date: 2022-09-10
categories: [array-and-hashmap]
---

We will take 3 list, one for less, one for equal and one for more than the pivot value. Then we iterate over the input list, append the value to the respective list. Finally we combine 3 list, and return as result.

```python
class Solution:
    def pivotArray(self, nums: List[int], pivot: int) -> List[int]:
        less, equal, more = [], [], []
        for num in nums:
            if num < pivot:
                less.append(num)
            elif num > pivot:
                more.append(num)
            else:
                equal.append(num)
        return less + equal + more
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
