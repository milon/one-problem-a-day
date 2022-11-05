---
extends: _layouts.post
section: content
title: Next greater element I
problemUrl: https://leetcode.com/problems/next-greater-element-i/
date: 2022-08-14
categories: [stack]
---

We traverse nums2 and start storing elements on the top of stack. If current number is greater than the top of the stack, then we found a pair. Keep popping from stack till the top of stack is smaller than current number. After matching pairs are found, push current number on top of stack. Eventually when there are no more elements in nums2 to traverse, but there are elements in stack, we can justify that next bigger element wasn't found for them. Hence we'll put -1 for the remaining elements in stack.

```python
class Solution:
    def nextGreaterElement(self, nums1: List[int], nums2: List[int]) -> List[int]:
        stack = []
        mapping = {}
        for n in nums2:
            while stack and n > stack[-1]:
                mapping[stack.pop()] = n
            stack.append(n)
        
        return [mapping.get(n, -1) for n in nums1]
```

Time Complexity: `O(n*m)`, n is length for nums1 and m is the length of nums2. <br/>
Space Complexity: `O(m)`