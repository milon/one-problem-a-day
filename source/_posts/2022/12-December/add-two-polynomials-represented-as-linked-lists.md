---
extends: _layouts.post
section: content
title: Add two polynomials represented as linked lists
problemUrl: https://leetcode.com/problems/add-two-polynomials-represented-as-linked-lists/
date: 2022-12-09
categories: [linked-list]
---

We will use the same approach as in the [merge two sorted lists](/problems/merge-two-sorted-lists/) problem. We will iterate over both lists and add the coefficients of the nodes with the same power. If the coefficient is zero, we will skip the node.

```python
class Solution:
    def addPoly(self, poly1: 'PolyNode', poly2: 'PolyNode') -> 'PolyNode':
        head = cur = PolyNode()
        while poly1 and poly2:
            if poly1.power > poly2.power:
                cur.next = cur = poly1
                poly1 = poly1.next
            elif poly1.power < poly2.power:
                cur.next = cur = poly2
                poly2 = poly2.next
            else:
                if coef := poly1.coefficient+poly2.coefficient:
                    cur.next = cur = PolyNode(coef, poly1.power)
                poly1, poly2 = poly1.next, poly2.next
        
        cur.next = poly1 or poly2
        return head.next
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`