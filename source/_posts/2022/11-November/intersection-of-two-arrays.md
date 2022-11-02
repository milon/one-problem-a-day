---
extends: _layouts.post
section: content
title: Intersection of two arrays
problemUrl: https://leetcode.com/problems/intersection-of-two-arrays/
date: 2022-11-02
categories: [intervals]
---

We can use 2 sets to store the elements of each array. Then we can iterate over the elements of the first set and check if it is present in the second set. If it is, we add it to the result.

```python
class Solution:
    def intersection(self, nums1: List[int], nums2: List[int]) -> List[int]:
        s1 = set(nums1)
        s2 = set(nums2)
        
        result = []
        for num in s1:
            if num in s2:
                result.append(num)
        
        return result
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can use 2 sets and get the intersection of the 2 sets.

```python
class Solution:
    def intersection(self, nums1: List[int], nums2: List[int]) -> List[int]:
        return set(nums1) & set(nums2)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`