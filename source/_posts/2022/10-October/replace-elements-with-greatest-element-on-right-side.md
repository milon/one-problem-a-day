---
extends: _layouts.post
section: content
title: Replace elements with greatest element on right side
problemUrl: https://leetcode.com/problems/replace-elements-with-greatest-element-on-right-side/
date: 2022-10-06
categories: [array-and-hashmap]
---

We will take the initial greatest element as -1. Then we start from the end of the array, replace the value with the greatest element and update the greatest element with the maximum of the greatest element and the current element. When we reach the beginning, we end the loop and return the array as result.

```python
class Solution:
    def replaceElements(self, arr: List[int]) -> List[int]:
        maxRight = -1
        for i in range(len(arr)-1, -1, -1):
            temp = arr[i]
            arr[i] = maxRight
            maxRight = max(temp, maxRight)
        return arr
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`